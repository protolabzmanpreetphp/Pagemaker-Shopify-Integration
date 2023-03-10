@extends('shopify-app::layouts.default')
@extends('layouts.style')
@section('content')
@extends('layouts.navigation')

<?php

        $buttonVisibility_pro_pg=$optionData['pgprod'];
        if($buttonVisibility_pro_pg=="no")
        {
            $defchecked_pro_pg="";
        }
        else
        {
            $defchecked_pro_pg="checked";
        }

        $buttonVisibility_cart_pg=$optionData['pgcart'];
        if($buttonVisibility_cart_pg=="no")
        {
            $defchecked_cart_pg="";
        }
        else
        {
            $defchecked_cart_pg="checked";
        }

?>

<div class="container">
    <div class="main">
        <div class="card">
            <div class="card-body">
                <div class="row wraps_first-div">
                    <div class="col-sm-12">
                        <div class="flex_wraps">
                            <p class="appear_wrap_text">This is how the button will appear on product, cart & checkout page. </p>
                            <button name='beamchkoutc' id='beamcheckoutbutton' onclick="alert('Hey, I am Working !');" class='btn-textc' style='width:347px;height:53px;border-style:none;border-radius:10px; background:url("https://phpstack-102119-3041881.cloudwaysapps.com/storage/img/Primarys.svg") no-repeat; background-size: cover; cursor: pointer !important; margin: 0px auto; margin-top: 10px !important;'></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <hr class="wrap_line">
                <div class="container">
                    <div class="main">
                        <div class="card">
                            <div class="card-body">
                    <div class="col-sm-12" style="padding:0px;">
                        <div class="w3-borderXX">
                            <h3 class="w3-label wrap_text-heading">Select Pages (Where you want to have beam checkout)</h3>
                            <input type="hidden" value="{{ $buttonVisibility_pro_pg }}" id="buttonvisibile_pro_pg">
                            <input type="hidden" value="{{ $buttonVisibility_cart_pg}}" id="buttonvisibile_cart_pg">
                            <div class="wrap_chkbox">
                                <input class="w3-check wrap_checkbox" type="checkbox" {{ $defchecked_pro_pg }} onchange="updateDbOption(getElementById('buttonvisibile_pro_pg').value,'pgprod');"> <span class="wrap_checkobx_text">Product page</span>
                            </div>
                            <div class="wrap_chkbox">
                                <input class="w3-check wrap_checkbox" type="checkbox" {{ $defchecked_cart_pg }} onchange="updateDbOption(getElementById('buttonvisibile_cart_pg').value,'pgcart');"> <span class="wrap_checkobx_text">Cart page</span>
                            </div>
                        </div>
                        <div class="w3-borderXX">
                            &nbsp;
                        </div>
                    </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        function updateDbOption(newValue,targtObj)
        {
            if(newValue != '')
            {
                $.ajax({
                    url: 'UpdateDB',
                    type: 'get',
                    data: {newval: newValue,tarobj: targtObj},
                    success: function(response)
                    {
                        toastr[response.status](response.message);
                    },
                });
            }
            else
            {
                alert('Something Went Wrong');
            }

            if(targtObj=="pgprod")
            {
                if(newValue=="yes")
                {
                    newValue="no";
                    $defchecked_pro_pg="checked";
                }
                else
                {
                    newValue="yes";
                    $defchecked_pro_pg="";
                }
                $('#buttonvisibile_pro_pg').attr('value', newValue);
            }
            else if(targtObj=="pgcart")
            {
                if(newValue=="yes")
                {
                    newValue="no";
                    $defchecked_cart_pg="checked";
                }
                else
                {
                    newValue="yes";
                    $defchecked_cart_pg="";
                }
                $('#buttonvisibile_cart_pg').attr('value', newValue);
            }
        }
        function installbutton()
        {
            $.ajax({
                url: '/snippetInstall',
                type: 'get',
                data: {},
                success: function(response)
                {
                    for(var msg in response.messages)
                    {
                        var status = response.messages[msg]['status'];
                        var message = response.messages[msg]['message'];
                        toastr[status](message);
                    }
                },
            });
        }
    </script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection


@extends('layouts.script')
