@extends('template')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div id="about">
        <h3>Help</h3>
    </div>

                <div class="col-xs-12">
                    <!--Collapsible Accordion Panel Group   -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Bagaimana cara mendapatkan akun?</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                        Untuk mendapatkan akun, anda dapat menghubungi pihak administrator pelayanan. Hanya seorang administrator yang dapat menambahkan akun operator atau admin.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Mengapa saya tidak bisa menambahkan register pemindahbukuan?</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Apakah nomor NPWP wajib pajak yang akan ditambahkan telah terdaftar di daftar wajib pajak? Atau terdapat kesalahan input dalam proses pendataan? periksa kembali nomor NPWP yang diinputkan apakah telah terdaftar di dalam daftar wajib pajak, jika tidak terdapat kesalahan, silahkan hubungi administrator pelayanan KPP Pratama.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Mengapa saya tidak bisa login?</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Periksa kembali apakah password dan email yang anda masukkan telah didaftarkan oleh administrator pelayanan.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Mengapa saya tidak bisa memperbaharui daftar pemindahbukuan?</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Periksa kembali apakah data yang anda masukkan adalah benar. Mungkin terdapat format input yang salah.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <!--End Collapsible Accordion Panel Group   -->
                </div>
            </div>
        </div>
@stop