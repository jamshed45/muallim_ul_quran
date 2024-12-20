@extends('layouts.master')
@section('title') Form Wizard @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Form Wizard @endslot
    @slot('subtitle') Forms @endslot
    @endcomponent

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Jquery Steps Wizard</h4>
                    <p class="card-title-desc">A powerful jQuery wizard plugin that
                        supports accessibility and HTML5</p>

                    <form id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                        <h3>Seller Details</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Contact Person</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtLastNameBilling" class="col-lg-3 col-form-label">Mobile No.</label>
                                        <div class="col-lg-9">
                                            <input id="txtLastNameBilling" name="txtLastNameBilling" type="text" class="form-control" placeholder="Enter your number">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtCompanyBilling" class="col-lg-3 col-form-label">Landline No.</label>
                                        <div class="col-lg-9">
                                            <input id="txtCompanyBilling" name="txtCompanyBilling" type="text" class="form-control" placeholder="Enter your number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Email Address</label>
                                        <div class="col-lg-9">
                                            <input id="txtEmailAddressBilling" name="txtEmailAddressBilling" type="text" class="form-control" placeholder="Enter your email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtAddress1Billing" class="col-lg-3 col-form-label">Address 1</label>
                                        <div class="col-lg-9">
                                            <textarea id="txtAddress1Billing" name="txtAddress1Billing" rows="4" class="form-control" placeholder="Enter your first address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtAddress2Billing" class="col-lg-3 col-form-label">Warehouse Address</label>
                                        <div class="col-lg-9">
                                            <textarea id="txtAddress2Billing" name="txtAddress2Billing" rows="4" class="form-control" placeholder="Enter your second address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtCityBilling" class="col-lg-3 col-form-label">Company Type</label>
                                        <div class="col-lg-9">
                                            <input id="txtCityBilling" name="txtCityBilling" type="text" class="form-control" placeholder="Enter your compny name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtStateProvinceBilling" class="col-lg-3 col-form-label">Live Market A/C</label>
                                        <div class="col-lg-9">
                                            <input id="txtStateProvinceBilling" name="txtStateProvinceBilling" type="text" class="form-control" placeholder="Enter A/C number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtTelephoneBilling" class="col-lg-3 col-form-label">Product Category</label>
                                        <div class="col-lg-9">
                                            <input id="txtTelephoneBilling" name="txtTelephoneBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end col -->
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtFaxBilling" class="col-lg-3 col-form-label">Product Sub Category</label>
                                        <div class="col-lg-9">
                                            <input id="txtFaxBilling" name="txtFaxBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                        <h3>Company Document</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtFirstNameShipping" class="col-lg-3 col-form-label">PAN Card</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameShipping" name="txtFirstNameShipping" type="text" class="form-control" placeholder="Enter pancard number">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtLastNameShipping" class="col-lg-3 col-form-label">VAT/TIN No.</label>
                                        <div class="col-lg-9">
                                            <input id="txtLastNameShipping" name="txtLastNameShipping" type="text" class="form-control" placeholder="Enter tin number">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtCompanyShipping" class="col-lg-3 col-form-label">CST No.</label>
                                        <div class="col-lg-9">
                                            <input id="txtCompanyShipping" name="txtCompanyShipping" type="text" class="form-control" placeholder="Enter csr number">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtEmailAddressShipping" class="col-lg-3 col-form-label">Service Tax No.</label>
                                        <div class="col-lg-9">
                                            <input id="txtEmailAddressShipping" name="txtEmailAddressShipping" type="text" class="form-control" placeholder="Service tax number">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtCityShipping" class="col-lg-3 col-form-label">Company UIN</label>
                                        <div class="col-lg-9">
                                            <input id="txtCityShipping" name="txtCityShipping" type="text" class="form-control" placeholder="Enter uin pin">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end col -->
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtStateProvinceShipping" class="col-lg-3 col-form-label">Declaration</label>
                                        <div class="col-lg-9">
                                            <input id="txtStateProvinceShipping" name="txtStateProvinceShipping" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                        <h3>Bank Details</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtNameCard" class="col-lg-3 col-form-label">Name on Card</label>
                                        <div class="col-lg-9">
                                            <input id="txtNameCard" name="txtNameCard" type="text" class="form-control" placeholder="Enter card name">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="ddlCreditCardType" class="col-lg-3 col-form-label">Credit Card Type</label>
                                        <div class="col-lg-9">
                                            <select id="ddlCreditCardType" name="ddlCreditCardType" class="form-select">
                                                <option value="">--Please Select--</option>
                                                <option value="AE">American Express</option>
                                                <option value="VI">Visa</option>
                                                <option value="MC">MasterCard</option>
                                                <option value="DI">Discover</option>
                                            </select>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtCreditCardNumber" class="col-lg-3 col-form-label">Credit Card Number</label>
                                        <div class="col-lg-9">
                                            <input id="txtCreditCardNumber" name="txtCreditCardNumber" type="text" class="form-control" placeholder="Enter credit card number">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtCardVerificationNumber" class="col-lg-3 col-form-label">Card Verification Number</label>
                                        <div class="col-lg-9">
                                            <input id="txtCardVerificationNumber" name="txtCardVerificationNumber" type="text" class="form-control" placeholder="Enter verification number">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="txtExpirationDate" class="col-lg-3 col-form-label">Expiration Date</label>
                                        <div class="col-lg-9">
                                            <input id="txtExpirationDate" name="txtExpirationDate" type="text" class="form-control" placeholder="DD /MM /YYYY">
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                        <h3>Confirm Detail</h3>
                        <fieldset>
                            <div class="p-3">
                                <div class="">
                                    <input type="checkbox" class="form-check-input me-2" id="customCheck1">
                                    <label class="form-label" for="customCheck1">I agree with the Terms and Conditions.</label>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <!-- end form -->
                </div>
            </div>
        </div>
    </div> <!-- row end -->

    @endsection
    @section('scripts')

    <!-- form wizard -->
    <script src="{{URL::asset('assets/libs/jquery-steps//jquery-steps.min.js')}}"></script>

    <!-- form wizard init -->
    <script src="{{URL::asset('assets/js/pages/form-wizard.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
