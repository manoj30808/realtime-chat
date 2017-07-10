 @if(!Auth::guest())
    <div class="row" style="padding: 0 3%;">
        @if ($errors->any())
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Error</h4>
                Please check the form below for errors
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Error</h4>
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Warning</h4>
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Info</h4>
                {{ $message }}
            </div>
        @endif
    </div>
@else
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Error</h4>
                {{ $message }}
            </div>
        @endif
    </div>
@endif