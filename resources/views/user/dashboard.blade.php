@extends('layouts.app')

@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr class="align-middle">
                                <td width="18%">
                                    <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{ $checkout->Camp->title }}</strong>
                                    </p>
                                    <p>
                                        {{ $checkout->created_at->format('M d, Y') }}
                                    </p>
                                </td>
                                <td>
                                    <strong>
                                        RP. {{ number_format($checkout->total, 0, 0, '.') }}
                                        @if ($checkout->discount_id)
                                            <span class="badge bg-success">Disc {{ $checkout->discount_percentage }}</span>
                                        @endif
                                    </strong>
                                </td>
                                <td>
                                    <strong>{{ $checkout->payment_status }}</strong>
                                </td>
                                <td>
                                    @if ($checkout->payment_status = 'waiting')
                                        <a href="{{ $checkout->midtrans_url }}" class="btn btn-primary">Pay Here</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="https://wa.me/089602748612?text=Hi, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}" class="btn btn-primary">
                                        Contact Support
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5">No camps registered</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection