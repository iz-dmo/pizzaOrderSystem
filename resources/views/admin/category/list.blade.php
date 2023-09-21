@extends('layouts.backend')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Category List</h2>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{route('admin#createCategory')}}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i> add item
                                </button>  
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>  
                        </div>
                    </div>
                    @if(session('deleteSuccess'))
                    <div class="col-md-4 offset-md-8">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-xmark"></i> {{session('deleteSuccess')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                            <div class="col-md-3">
                                <h5>Search Key : <span class="text-danger">{{request('key')}}</span></h5>
                            </div>
                            <div class="col-md-3 offset-md-6">
                                <form action="{{route('admin#categoryPage')}}" method="get">
                                    @csrf
                                    <div class="d-flex float-end">
                                        <input type="text" name="key" id="" class="form-control rounded px-2" Placeholder="Search" value="{{request('key')}}">
                                        <button class="btn btn-primary text-light" type="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col mt-3 offset-md-9 w-25 text-center py-2">
                                <h5 class="text-secondary shadow w-50 py-2 rounded">TOTAL - ({{$categories->total()}})</h5>
                            </div>
                    </div>
                    @if(count($categories) != 0)
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Created_at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tBody">
                                <tr class="tr-shadow">
                                    @foreach($categories as $category)
                                    <td>{{$category->id}}</td>
                                    <td class="desc">{{$category->name}}</td>
                                    <td>{{$category->created_at->format('j-F-Y')}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send text-success"></i>
                                            </button>
                                            <a href="{{ route ('edit#Category',$category->id) }}">
                                                <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit text-info"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('deleteCategory',$category->id)}}">
                                                <button class="item mx-3 delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete text-danger"></i>
                                                </button>
                                            </a>
                                            <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-2 offset-md-10 ">
                            {{$categories->links()}}
                        </div>
                    </div>
                    @else
                    <h3 class="mt-5 text-secondary text-center">There is nothing for Categories</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

        <!-- Delete Modal -->
   
@endsection

