
// document.addEventListener("load", async () => {
async function test() {

    const user = localStorage.getItem("user")
    const pass = localStorage.getItem("pass")

    const payload = new FormData();
    payload.append("userName", user)
    payload.append("userPassword", pass)
    // console.log(payload)

    const response = await fetch("http://localhost/goparcel/api/userSignin.php",
        {
            method: "POST",
            body: payload
        });
    let data = await response.text();
    if (data.startsWith("SUCCESS")) {
        document.querySelector(".navbar").innerHTML += `
        <div class="drop-section close"><img class="x" src="./icon/x.svg" class="x">
        <div class="each-section profile">
                ${data.split(";")[1]}
        </div>
        <div class="each-section up-profile">
            <a href="./profile.html">
                <img src="./icon/acc-manage.svg">
                Manage account
            </a>
        </div>
        <div class="each-section logout">
                <img src="./icon/logout.svg">
                Logout
        </div>
    </div>`

        //     <div class="each-section order">
        //     <a href="">
        //         <img src="./icon/order.svg">
        //         Manage order
        //     </a>
        // </div>
        const account = document.querySelector(".account-section")
        account.style.right = "36px"
        account.style.top = "-7px"
        account.innerHTML = "<img src='./icon/user.svg' style='height: 37px;border: 3px solid black;border-radius: 40px;padding: 9px;cursor: pointer;'>"
        account.addEventListener("click", (e) => {
            const drop = document.querySelector(".drop-section")
            drop.classList.remove("close")
        })

        document.querySelector(".x").addEventListener("click", (e) => {
            const drop = document.querySelector(".drop-section")
            drop.classList.add("close")
        })

        document.querySelector(".logout").addEventListener("click", (e) => {
            localStorage.removeItem("user")
            localStorage.removeItem("pass")
            window.location.href = "./index.html"
        })
    }
}
test()

// })