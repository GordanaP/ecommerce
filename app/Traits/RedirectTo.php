<?php

namespace App\Traits;

trait RedirectTo
{
    /**
     * Redirect after a post request.
     *
     * @param  string $name
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    public function redirectAfterStoring($name, $parameter = null)
    {
        switch (request()->submitButton) {
            case 'DoAndDisplay':
                return $this->showRoute($name, $parameter);
                break;

            case 'DoAndRepeat':
                return back();
                break;
        }
    }

    /**
     * Redirect after a put/patch request.
     *
     * @param  string $name
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    public function redirectAfterUpdate($name, $parameter)
    {
        switch (request()->submitButton) {
            case 'DoAndDisplay':
                return $this->showRoute($name, $parameter);
                break;

            case 'DoAndRepeat':
                return $this->editRoute($name, $parameter);
                break;
        }
    }

    /**
     * Redirect after a delete request.
     *
     * @param  string $name
     * @return mixed
     */
    public function redirectAfterDeleting($name)
    {
        if(request()->ajax()) {
            return response([
                'alertMessage' => $this->deleteResponse(),
            ]);
        }
        else {
            return $this->indexRoute($name)
                ->with($this->deleteResponse());
        }
    }

    /**
     * Get a show model route.
     *
     * @param  string $name
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    protected function showRoute($name, $parameter)
    {
        return redirect()->route($name.'.show', $parameter);
    }

    /**
     * Get an edit model route.
     *
     * @param  string $name
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    protected function editRoute($name, $parameter)
    {
        return redirect()->route($name.'.edit', $parameter);
    }

    /**
     * Get an index model route.
     *
     * @param  string $name
     * @return mixed
     */
    public function indexRoute($name)
    {
        return redirect()->route($name.'.index');
    }

    /**
     * Response message following a post request.
     *
     * @param  string $name
     * @return array
     */
    public function storeResponse()
    {
        return getAlert('A new record has been added.', 'success');
    }

    /**
     * Response message following a put/patch request.
     *
     * @param  string $name
     * @return array
     */
    public function updateResponse()
    {
        return getAlert('The record has been updated.', 'success');
    }

    /**
     * Response message following a delete request.
     *
     * @param  string $name
     * @return array
     */
    public function deleteResponse()
    {
        if(request()->ajax())
        {
            $message = 'The record has been deleted.';
        }
        else{
            $message = getAlert('The record has been deleted.', 'success');
        }

        return $message;
    }
}
