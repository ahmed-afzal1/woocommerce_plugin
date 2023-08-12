@extends('layouts.user')

@push('css')

@endpush

@section('contents')

<div class="breadcrumb-area">
  <h3 class="title">@lang('Dashboard')</h3>
  <ul class="breadcrumb">
      <li>
          <a href="{{ route('user.dashboard') }}">@lang('Dashboard')</a>
      </li>
      <li>
          @lang('Dashboard')
      </li>
  </ul>
</div>

<div class="dashboard--content-item">
    <div class="dashboard--wrapper">
        <div class="dashboard--width">
            <div class="dashboard-card h-100">
                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{asset('assets/images/gross.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">@lang('Main Balance')</h6>
                        <div class="balance">{{ auth()->user()->balance }} $</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard--width">
            <div class="dashboard-card h-100">
                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{asset('assets/images/money.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">@lang('Interest Balance')</h6>
                        <div class="balance">580 $</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard--width">
            <div class="dashboard-card h-100">
                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{asset('assets/images/money.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">@lang('Deposits')</h6>
                        <div class="balance">720 $</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard--width">
            <div class="dashboard-card h-100">
                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{asset('assets/images/money.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">@lang('Payouts')</h6>
                        <div class="balance">580 $</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="dashboard--content-item">
  <div class="row gy-4">
      <div class="col-md-12">
          <div class="dashboard--content-item">
              <h5 class="dashboard-title">@lang('Referral URL')</h5>
              <div class="dashboard-refer">
                  <div class="input-group input--group">
                      <input type="text" class="form-control form--control" readonly
                          value="{{ url('/').'?reff=1234546789'}}" id="cronjobURL">
                      <button class="input-group-text px-3 btn--primary border-0" type="button" id="copyBoard" onclick="myFunction()">
                          <i class="far fa-copy"></i>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="dashboard--content-item">
	  <div class="table-responsive table--mobile-lg">
		  <table class="table bg--body">
			  <thead>
				  <tr>
					<th>@lang('No')</th>
					<th>@lang('Date')</th>
					<th>@lang('Type')</th>
					<th>@lang('Txnid')</th>
					<th>@lang('Amount')</th>
					<th>@lang('Details')</th>
				  </tr>
			  </thead>
			  <tbody>
                @if (count($transactions) == 0)
                    <tr>
                    <td colspan="12">
                        <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                    </td>
                    </tr>
                @else
				@foreach($transactions as $key=>$data)
				  @php
					  $from = App\Models\User::where('id',$data->user_id)->first();
				  @endphp
					<tr>
						<td data-label="@lang('No')">
							<div>

							<span class="text-muted">{{ $loop->iteration }}</span>
							</div>
						</td>

                        <td data-label="@lang('Date')">
							<div>
							{{date('d M Y',strtotime($data->created_at))}}
							</div>
						</td>

						<td data-label="@lang('Type')">
							<div>
							{{ strtoupper($data->type) }}
							</div>
						</td>

						<td data-label="@lang('Txnid')">
							<div>
							{{ $data->txnid }}
							</div>
						</td>

						<td data-label="@lang('Amount')">
							<div>
							<p class="text-{{ $data->profit == 'plus' ? 'success' : 'danger'}}">{{ $data->amount }} USD</p>
							</div>
						</td>

                        <td data-label="Details">
                            <div class="text-center">
                                <a href="{{ route('user.billing.details',$data->id) }}" class="btn btn--base text--dark btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                    @lang('Billing details')
                                </a>
                            </div>
                        </td>

					</tr>
			  @endforeach
	        @endif

			  </tbody>
		  </table>
	  </div>
</div>
@endsection

@push('js')
    <script>
      'use strict';

      function myFunction() {
        var copyText = document.getElementById("cronjobURL");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $.notify("Referral url copied", "info");
    }
    </script>
@endpush
