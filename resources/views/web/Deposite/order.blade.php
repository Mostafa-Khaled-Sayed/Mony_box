
@extends('../web.layout')

@section('main')



        <div class='container text-center mt-5'>
             <h2>Order Grad Rules</h2>
            <p class='pt-3'>Constract Content</p>
            {{-- <p class='pt-3'>Number of orders per day: <span>28</span></p> --}}
            <p class='pt-3'>purchasing price: <span>{{$data->price}}</span></p>
            <p class='pt-3'>Validity Period: <span>{{$data->time_end*24}} hr</span></p>
            <div class='row1'>
                <a type="button"
                    class='Step mb-5 w-25 p-1 mt-5 text-white d-flex align-items-center justify-content-center' data-toggle="modal" data-target="#model1">Join the contact</a>
            </div>

             <p class='pt-3 text-start d-flex align-items-center justify-content-center'>The current room is {{$data->title}},
                which automatically grabs a single room. <br /> The demand amount is {{$data->price}}, the total profit of the order
                is {{$data->gift}}, the <br /> order end time is {{$data->time_end}} days, the project quota is limited, you can <br /> only
                purchase one project at a time, and you can purchase <br /> the next project after the current project
                ends.</p>
        </div>
    <!-- Modal -->
    <div class="modal mt-5 fade" id="model1" tabindex="-1" role="dialog" aria-labelledby="model1Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content  bg-light">

                <div class="modal-body">
                <p>2. Can participate in "Grabe order" after joing</p>
                <p>3. Additional recharge is required into the contract room wallet, and the income will also be transferred to the balance
                form the contract room wallet after the contract ends .</p>
                <p>4. can still withdraw from balance after joining</p>
                <p>5 If you have any questions about this , function please, contact customer service before us</p>
            <label class="checkbox-container">
                <input type="checkbox" id="privacyPolicyCheckbox" required>

                <span class="checkmark">22</span>
                I have understand and agreed to the terms of use
                <p id="statusMessage"></p>

            {{-- <form  id="submitButton" action="">
                <input type="submit"  value="Join the contact">
            </form> --}}
            <a type="submit" id="submitButton" href="{{route('autodataindex',$data->id)}}"  class="btn btn-primary"
                    data-target="#model2">Join the contact</a>

            </label>
            </div>

                {{-- <a type="submit" class="btn btn-primary"
                    data-target="#model2"></a> --}}

            </div>
        </div>
    </div>

@endsection
<script>
//    console.log(document.querySelector('#privacyPolicyCheckbox').value);
</script>
<style>
    #submitButton{
        display: none;
    }

    #privacyPolicyCheckbox:checked ~ #submitButton{
            display: block ;

    }
</style>
