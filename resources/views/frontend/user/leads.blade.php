@extends('frontend.user.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box">
                                            <h4 class="page-title">Property Leads</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="table">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">User Details</th>
                                                <th class="text-center">Property Type</th>
                                                <th class="text-center">Property Name</th>
                                                <th class="text-center">Property</th>
                                                <th class="text-center">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>
                                                    <b>Name: </b>Shailesh Gupta <br>
                                                    <b>Phone: </b> +91-1234567890<br>
                                                    <b>Address: </b> Varanasi, Uttar Pradesh, India.
                                                </td>
                                                <td class="text-center">Flat Apartment</td>
                                                <td class="text-center">How SOS Children's Villages and GiveIndia are
                                                    helping kids orphaned amid COVID find hope for the future</td>
                                                <td>
                                                    <b>Name: </b>How SOS Children's Villages and GiveIndia are helping kids
                                                    orphaned amid COVID find hope for the future <br>
                                                    <b>Plot Number: </b> <br>
                                                    <b>Plot Area: </b> sqft. (X)
                                                </td>
                                                <td>
                                                    <b>Price: </b>233 <br>
                                                    <b>sqft. Price: </b>10.13
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Showing 1 to 1 of 2 Properties</b></p>
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
