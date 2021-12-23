@extends('layouts.backend.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <span class="pull-right">(<strong>5</strong>) items</span>
                <h5>Semua Transaksi</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">

                        <tbody>
                        <tr>
                            <td width="90">
                                <div class="cart-product-imitation">
                                </div>
                            </td>
                            <td class="desc">
                                <h3>
                                <a href="#" class="text-navy">
                                    Desktop publishing software
                                </a>
                                </h3>
                                <p class="medium">
                                    status:
                                </p>
                                <p class="medium">
                                    tanggal transaksi :
                                </p>
                                {{-- <dl class="medium m-b-none">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                </dl> --}}

                                <div class="m-t-sm">
                                    <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                        <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                        Unggah Bukti Pembayaran
                                    </label>
                                </div>
                            </td>

                            <td>
                                $180,00
                                <s class="small text-muted">$230,00</s>
                            </td>
                            <td width="65">
                                <input type="text" class="form-control" placeholder="1">
                            </td>
                            <td>
                                <h4>
                                    $180,00
                                </h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
