@extends('web.layout')

@section('main')
       <div class="deposit-header">
           <h5>Rule Description</h5> 
           <div class="deposit-back">
                 <a onclick="javascript:history.go(-1)">
               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
                </a>
           </div>
        </div>
        <div class='container text-center'>
            <div class='row'>
                <div class="Box col-md-6 col-lg-12">
                    <div class="mt-3 text-start">
                        <img src='../IMG/Rule1.png' class='w-100' alt='' />
                        <p class='fw-bold pt-3'>About deposit</p>
                        <p>Since Sales-Ranking Assistant members come from many <br /> different countries and use
                            different currencies, Sales-Ranking <br /> Assistant uses cryptocurrency transactions to
                            <br /> simplify transactions. Please check Sales-Ranking <br /> Assistant's USDT address
                            carefully before recharging (the <br /> platform recharge address can be changed at any
                            time, <br /> and users must go to the platform to obtain the latest <br /> recharge address
                            before recharging). If you have any <br /> questions, please contact customer service.</p>
                        <p class='fw-bold'>About order amount</p>
                        <p>The order amount paid by Sales-Ranking Assistant <br /> members is determined by the member’s
                            account <br /> balance, access to orders, and markets conditions on the day. <br /> The
                            maximum number of orders each account can <br /> send per day depends on your user level.
                        </p>
                        <p class='fw-bold'>About order-grab commission</p>
                        <img src='../IMG/Rule2.png' class='w-100' alt='' />
                        <p class='fw-bold pt-4'>About withdrawal</p>
                        <p>• The withdrawal time of Sales-Ranking Assistant is usually <br /> within 24 hours, and the
                            service fee for each withdrawal <br /> will be charged a certain fee by the cryptocurrency
                            system.</p>
                        <p>• In order to avoid frequent payment and cause Sales-Ranking <br /> Assistant to incur
                            additional taxes, the minimum <br /> withdrawal amount is 5 USDT</p>
                        <p>※At the request of relevant departments, in <br /> order to prevent members from being <br />
                            suspected of money laundering and other <br /> illegal activities, Sales-Ranking Assistant
                            <br /> members need to complete the order <br /> volume corresponding to the user level
                            <br /> every day before they can withdraw.</p>
                        <p class='fw-bold'>About level requirements</p>
                        <p>You can increase your user level by completing various metrics. <br /> Please refer to the
                            current level progress, <br /> benefits and upgrade conditions for each level.</p>
                        <p class='fw-bold'>Disclaimer</p>
                        <p>• The terms and conditions contained herein may be <br /> changed or modified at any time.
                            Your continued <br /> participation in the program means that you accept any <br /> changes
                            or modifications to these terms and conditions.</p>
                        <p>• In the event of fraud or other related behaviors, <br /> including but not limited to the
                            above examples, Sales-Ranking <br /> Assistant reserves the right to warn or freeze your
                            account.</p>
                        <p>• The final interpretation of the above rules belongs to Sales-Ranking <br /> Assistant, and
                            reserves the right to adjust <br /> and change</p>
                    </div>
                </div>
            </div>
        </div>  
@endsection
