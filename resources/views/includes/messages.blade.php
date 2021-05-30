@if(Session::get('success'))
    <div class="alerts alerts-success">
        <span class="icon">
            <i class="fa fa-check"></i>
        </span>

        <div class="texts">
            <strong>Success</strong>
            <p>{{Session::get('success')}}</p>
        </div>

        <button class="close">
            <i class="fa fa-close"></i>
        </button>
    </div>
@endif

@if(Session::get('info'))
    <div class="alerts alerts-info">
          <span class="icon">
            <i class="fa fa-info"></i>
        </span>

        <div class="texts">
            <strong>Info</strong>
            <p>{{Session::get('info')}}</p>
        </div>

        <button class="close">
            <i class="fa fa-close"></i>
        </button>
    </div>
@endif

@if(Session::get('error'))
    <div class="alerts alerts-danger">
        <span class="icon">
            <i class="fa fa-close"></i>
        </span>

        <div class="texts">
            <strong>Danger</strong>
            <p>{{Session::get('error')}}</p>
        </div>

        <button class="close">
            <i class="fa fa-close"></i>
        </button>
    </div>
@endif

@if($errors->count() > 0)
   @foreach ($errors->all() as $error)
        <div class="alerts alerts-danger">
        <span class="icon">
            <i class="fa fa-close"></i>
        </span>

        <div class="texts">
            <strong>Danger</strong>
            <p>{{$error}}</p>
        </div>

        <button class="close">
            <i class="fa fa-close"></i>
        </button>
        </div>
   @endforeach
@endif
