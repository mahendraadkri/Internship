<div class="form-group">
    <label for="">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" id="" class="form-control border" placeholder="" aria-describedby="helpId" >
    <span class="text-danger">
        {{-- @error('name')
            {{$message}}
        @enderror --}}
    {{-- <small id="helpId" class="text-muted">Help Text</small> --}}
    </span>
</div>