@extends('layouts.user')

@push('css')

@endpush

@section('contents')
<div class="breadcrumb-area">
  <h3 class="title">@lang('Billing Details')</h3>
  <ul class="breadcrumb">
      <li>
          <a href="#">@lang('Billing')</a>
      </li>
      <li>
          @lang('Billing Details')
      </li>
  </ul>
</div>

<div class="dashboard--content-item">
  <div class="table-responsive-sm">
      <table class="table mb-0">
          <tbody>
            @if ($data)
                <tr class="border-top">
                    <th class="45%" width="45%">{{__('First Name')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->first_name }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Last Name')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->last_name }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Email')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->email }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Phone')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->phone }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Company')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->company }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Address 1')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->address_1 }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Address 2')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->address_1 }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Country')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->country }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('City')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->city }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('State')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->state }}</td>
                </tr>

                <tr>
                    <th class="45%" width="45%">{{__('Postcode')}}</th>
                    <td width="10%">:</td>
                    <td class="45%" width="45%">{{ $data->postcode }}</td>
                </tr>
            @else
            <tr>
                <td class="100%" width="45%">@lang('NO DATA FOUND')</td>
            </tr>
            @endif

          </tbody>
      </table>
  </div>
</div>


@endsection

@push('js')

@endpush
