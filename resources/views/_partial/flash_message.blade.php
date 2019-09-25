@if (Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('Penting') ? 'alert-important' : '' }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
        {{ Session::get('flash_message') }}
    </div>
@endif