<div id="root">
        <div class='P'>
            <div class='Pa'>
                <h1 class='d-flex align-items-center pt-5'>Deposit</h1>
                <h2 class='d-flex align-items-center pt-3'>Deposit amount (USDT-TRC20)</h2>
                <input type="number" placeholder="Please enter" id="Input" class='s p-1 text-start' />
                <p class='text-end pt-2 En' id="En">Please Enter This Feild!</p>
                <h4 class='d-flex align-items-center  text-end'>Tips</h4>
                <p class='d-flex align-items-center  text-end'>1. Please provide the required info above to complete the
                    payment</p>
                <p class='d-flex align-items-center  text-end'>2. Promotion 8%,amount that you actually receive is 0</p>
                <p class='d-flex align-items-center  text-end'>3. amount limit 500 - 500000</p>
                <a target='_blank' id="Pay">Go Pay</a>
            </div>
        </div>
    </div>
    <script>
        var a = document.getElementById("Input");
        var b = document.getElementById("Pay");
        var c = document.getElementById("Em");
        b.onclick = function () {
            if (a.value === "") {
                window.alert("Please Enter This Field");
                c.classList.add("d-flex");
            };
        };
    </script>
