@extends('layouts.frontend');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Show Category Details
                        <a href="{{url('category')}}" class="btn btn-primary float-end">Back</a>
                    </h1>
                    </div>

                    <div class="card-body">
       
                        
                        <div class="mb-3">
                            <label>Name</label>
                            <p>
                                {{$category->name}}
                            </p>
                            @error('name') <span class="text-danger"> {{$message}} </span> @enderror
                        </div>
                         
                        <div class="mb-3">
                            <label>Description</label>
                            <p>
                                {!! $category ->description !!}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Status </label>
                            <p>
                                {{$category ->status == 1 ? 'checked': ''}}
                            </p>

</div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                       </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection