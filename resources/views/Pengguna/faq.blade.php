@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>FAQ - Pertanyaan yang Sering Diajukan</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    Bagaimana cara memesan motor?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    Pilih motor, isi form sewa, dan konfirmasi pesanan Anda.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    Apa saja syarat sewa motor?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    KTP, SIM C, dan mengisi data diri dengan benar.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection