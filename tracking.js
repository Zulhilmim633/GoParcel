const track_form = document.querySelector(".Track")
const input_field = track_form.getElementsByClassName("tracknumber");

let query = new URL(window.location.href);
print = console.log

track_form.addEventListener("submit",async (e)=>{
        e.preventDefault();      

        console.log(input_field.value)
        let result = await fetch(`http://localhost/goparcel/api/track.php?id=${input_field.value}`);
        
})

if(query.search.indexOf("v") > 0) {
        let track_number = query.searchParams.get("v");
        input_field.value = track_number;
        document.forms[0].submit();
}

// let progress = await fetch(`./api/track.php?id=${trackid}`).
//         then(res=>{return res})
