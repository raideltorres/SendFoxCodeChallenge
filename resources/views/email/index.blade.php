@extends('layouts.app')

@section('content')
<div class="container mail-container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Mail List') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mails as $mail)
                                        <tr>
                                            <th scope="row">{{ $mail->id }}</th>
                                            <td>{{ $mail->subject }}</td>
                                            <td>{!! $mail->body !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $mails->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
