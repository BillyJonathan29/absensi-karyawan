@extends('layouts.dashboard')
@section('title', $title)

@section('content')
<div class="dashboard-content">
    <div class="container-xl">

                <section class="table-section">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Riwayat Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ORD12345</td>
                                        <td>John Doe</td>
                                        <td>2024-08-01</td>
                                        <td>Completed</td>
                                        <td>$123.45</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>ORD12346</td>
                                        <td>Jane Smith</td>
                                        <td>2024-08-02</td>
                                        <td>Pending</td>
                                        <td>$234.56</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

    </div>
</div>



</script>
@endsection
