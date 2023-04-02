const form = document.forms[0];
form.addEventListener("submit",async (e)=>{
    e.preventDefault();
    const stateFrom = form.shipFrom.value;
    const stateTo = form.shipTo.value;
    const weight = parseInt(form.weight.value);

    const response = await fetch(`http://localhost/goparcel/api/priceByState.php?stateFrom=${stateFrom}&stateTo=${stateTo}`,
    {
        method: "GET"
    })
    const data = await response.text();
    if(data.startsWith("SUCCESS")){
        let priceRoute = parseInt(data.split(":")[1])
        let nextday = parseInt(data.split(":")[1])+3
        if(weight>2){
            priceRoute += weight < 17 ? weight : weight+10
            nextday += weight < 17 ? weight : weight+10
        }

        document.querySelector(".result").innerHTML = `<table>
        <tr>
            <th>Shipping Type</th>
            <th>Shipping Rates (RM)</th>
            <th>Total include Tax (RM)</th>
        </tr>
        <tr>
            <td>Regular</td>
            <td>${priceRoute}.00</td>
            <td>${priceRoute+=priceRoute*0.06}</td>
        </tr>
        <tr>
            <td>Next Day</td>
            <td>${nextday}.00</td>
            <td>${nextday+=nextday*0.06}</td>
        </tr>
    </table>`
    }
    else if(data.startsWith("ERROR")){
        if(data.split(":")[1]=="STATE"){
            alert("State not exist")
        }
    }
})