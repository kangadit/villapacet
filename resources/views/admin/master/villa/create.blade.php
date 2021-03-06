@extends('template.app')

@section('pagetitle','Tambah Villa')

@push('customcss')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <style>
        .label-required{
            font-size: 14px;
            color: red;
        }
    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-success">
                <form action="{{ route('villa.store') }}" method="post" class="form" enctype="multipart/form-data">
                    <div class="box-body">

                        @csrf  {{--sisa--}}
                        @method('POST')

                        <div class="form-group">
                            <label for="">Nama Villa <span class="label-required">*</span></label>
                            <input type="text" name="nama_villa" class="form-control input-sm" placeholder="Nama Villa..."
                                required maxlength="80" value="{{ old('nama_villa') }}">
                        </div>

                        <div class="form-group">
                            <label for="">Alamat <span class="label-required">*</span></label>
                            <input type="text" name="alamat" class="form-control input-sm" placeholder="Alamat..."
                                required min="0" max="180" value="{{ old('alamat') }}">
                        </div>

                        <div class="form-group">
                            <label for="images">Gambar Villa</label>
                            <input type="file" id="images" multiple name="images[]" id="images" accept="image/*">
                            <p class="help-block">Only File Images (.jpg/.jpeg/.png)</p>
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Fasilitas</label>
                            <textarea id="fasilitas" class="form-control" name="fasilitas">{{ old('fasilitas') }}</textarea>
                        </div>
                    </div> <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-md btn-success"> <i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('customscript')
    <script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            //description
            $('#deskripsi').wysihtml5({
                toolbar : {
                    "image": false,
                    "blockquote": false,
                    "link": false,
                    "lists": false,
                }
            });

            //fasilitas
            $('#fasilitas').wysihtml5({
                toolbar : {
                    "image": false,
                    "blockquote": false,
                    "link": false,
                    "lists": true,
                }
            });

        });
    </script>
@endpush