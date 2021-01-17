@extends('admin.layout.master')
@section('content')


    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">

            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="{{ url('/admin/settings/akun') }}" method="post" class="tm-login-form">
                  @csrf
                  @if (session('errors'))
                    <div class="alert alert-danger">
                        {{ session('errors') }}
                    </div>
                @endif
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="username"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value="{{ $akun[0]->username }}"
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password_lama">Password Lama</label>
                    <input
                      name="password_lama"
                      type="password"
                      class="form-control validate"
                      id="password_lama"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password_baru">Password Baru</label>
                    <input
                      name="password_baru"
                      type="password"
                      class="form-control validate"
                      id="password_baru"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Update Akun
                    </button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('script')
@endsection
    