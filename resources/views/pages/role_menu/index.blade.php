@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5>Set Menu ke role user</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row p-5">
                    @foreach($role as $row)
                    <div class="col-sm-3">
                        <a href="{{ URL::to('admin/role_menu/'. $row->id) }}"
                            class="card-body d-flex flex-column  align-items-center justify-content-center icon-folder main-radius">
                            <i class="fas fa-folder  text-warning"></i>
                            <p class="mb-0">{{ $row->name}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
$('#li').addClass('active');
$('#liRoleMenu').addClass('active');
</script>
@endsection