@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <a href="">Terug gaan</a>
</div>
    <div class="container mt-5">
        <h2><strong>Web Research</strong></h2>

        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
            Klik voor algemene statistieken
        </button>
        <div class="collapse" id="collapseExample">
            <div class="col-md-9 mt-2">
                <div class="row">
                    <div class="col-md-5 pt-3 pl-0">
                        <h4>Aanwezigheden over 3 lessen</h4>

                        Totaal<span class="pull-right strong"></span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85"
                                 aria-valuemin="0" aria-valuemax="100" style="width:85%">85%
                            </div>
                        </div>

                        Gem. per les<span class="pull-right strong"></span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100" style="width:80%">80%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-5 pb-2">Overzicht studenten</h4>

        <div class="row pt-2">
            <div class="col-md-6">
                <h5><strong>Maxim Ganses</strong></h5>
        </div>
            <div class="col-md-6">

                <span class="pull-right">6</span>

                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="4"
                         aria-valuemin="0" aria-valuemax="100" style="width:80%">4
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-md-6">
                <h5><strong>Arthur van Passel</strong></h5>
            </div>
            <div class="col-md-6">

                <span class="pull-right">6</span>

                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="4"
                         aria-valuemin="0" aria-valuemax="100" style="width:20%">2
                    </div>
                </div>
            </div>
        </div>


        <div class="row pt-2">
            <div class="col-md-6">
                <h5><strong>Tymo de Kock</strong></h5>
            </div>
            <div class="col-md-6">

                <span class="pull-right">6</span>

                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="4"
                         aria-valuemin="0" aria-valuemax="100" style="width:50%">3
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
