      @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
               {{$erro}} <br>
            @endforeach
        </div>
      @endif

      @if(isset($errors_bd) && count($errors_bd)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-warning">
            @foreach($errors_bd as $erro)
               {{$erro}} <br>
            @endforeach
        </div>
      @endif      