<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>EcomLaravel Invoice</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<h4><b>{{ env('APP_NAME') }}</b></h4>
								</td>

								<td>
									Invoice #: {{ $order->invoice_number }}<br />
									Created: {{ date("F d, Y", $order->order_date) }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									{{ strtoupper($order->name) }}<br>{{ strtoupper($order->address) }}<br>{{ $order->area->post_office_name }}<br>{{ $order->city->city_name }}<br>{{ $order->division->division_name }}-{{ $order->post_code }}<br>Bangladesh

								</td>

								<td>
									EcomLaravel.<br />
									John Doe<br />
									ecomlaravel@example.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>{{ $order->payment_type }} #</td>
				</tr>

				{{-- <tr class="details">
					<td>{{ $order->payment_type }}</td>

					<td>1000</td>
				</tr> --}}

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

                @foreach ($orderitems as $orderitem)
                <tr class="item">
					<td>{{ $orderitem->product->product_name_en }}</td>

					<td>${{ $orderitem->price*$orderitem->qty }}</td>
				</tr>
                @endforeach

				<tr class="item">
					<td>Tax</td>

					<td>${{ $order->tax }}</td>
				</tr>
                @if ($order->discount)
                <tr class="item last">
					<td>Discount</td>

					<td>${{ $order->discount }}</td>
				</tr>
                @endif
				

				<tr class="total">
					<td></td>

					<td>Total: ${{ round($order->amount) }}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
