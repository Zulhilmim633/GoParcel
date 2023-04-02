
// document.addEventListener("load", async () => {
    // async function test() {
const priors = localStorage.getItem("prior")
if (priors != null) {
    document.querySelector(".navbar").innerHTML += `
    <div class="drop-section close"><img class="x" src="../icon/x.svg" class="x">
    <div class="each-section logout">
            <img src="../icon/logout.svg">
            Logout
    </div>
</div>`
    const account = document.querySelector(".account-section")
    account.style.right = "36px"
    account.style.top = "-7px"
    account.innerHTML = "<img src='../icon/user.svg' style='height: 37px;border: 3px solid black;border-radius: 40px;padding: 9px;cursor: pointer;'>"
    account.addEventListener("click", (e) => {
        const drop = document.querySelector(".drop-section")
        drop.classList.remove("close")
    })

    document.querySelector(".x").addEventListener("click", (e) => {
        const drop = document.querySelector(".drop-section")
        drop.classList.add("close")
    })

    document.querySelector(".logout").addEventListener("click", (e) => {
        localStorage.removeItem("prior")
        window.location.href = "../index.html"
    })
}
    // }
    // test()
    
    // })