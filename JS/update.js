const form = document.forms[0];
var oldPassword;
async function load() {
    const user = localStorage.getItem("user")
    const passw = localStorage.getItem("pass")

    const payload = new FormData()
    payload.append("userName", user)
    payload.append("userPassword", passw)

    const response = await fetch("http://localhost/goparcel/api/gather_user.php",
        {
            method: "POST",
            body: payload
        });
    let data = await response.text();
    console.log(data)
    if (data.startsWith("ERROR")) {
        alert("Please Sign in first")
        window.location.href = "./SignIn.html"
    }
    let res = data.split(":")[1].split(";");
    form.userName.value = res[0]
    form.FullName.value = res[1]
    form.userEmail.value = res[2]
    form.userAddress.value = res[3]
    form.userPhoneNo.value = res[4]

    oldPassword = res[5]
}
load()

form.addEventListener("submit", async (e) => {
    let keys = Object.keys(form)
    keys.forEach((item, index) => {
        form[item].value = form[item].value.trim()
        if (form[item].classList.contains("exist")) {
            console.log(form[item])
            form[item].classList.remove("exist")
            console.log(form[item])
            let temp_text = form[item].previousElementSibling.innerHTML
            form[item].previousElementSibling.innerHTML = temp_text.split(" - ")[0]
        }
    })
    e.preventDefault();


    setTimeout(async () => {
        if (form.oldPass.value.trim() != "" || form.newPass.value.trim() != "" || form.CPass.value.trim() != "") {
            if (form.oldPass.value != oldPassword) {
                form.oldPass.classList.add("exist")
                form.oldPass.previousElementSibling.innerHTML = "Old Password - <span class='existing'>Doesn't match old password</span>";
            }
            if (form.newPass.value != form.CPass.value) {
                form.newPass.previousElementSibling.innerHTML = "New Password - <span class='existing'>Not match with Confirm New Password</span>"
                form.CPass.previousElementSibling.innerHTML = "Confirm New Password - <span class='existing'>Not match with New Password</span>"
                form.newPass.classList.add("exist")
                form.CPass.classList.add("exist")
            }
        }
        else if (form.FullName.value == ""){
            form.FullName.classList.add("exist")
            form.FullName.previousElementSibling.innerHTML = "Full Name same as IC - <span class='existing'>Cannot be empty</span>";
        
        }
        else {

            const payload = new FormData(form);
            payload.delete("oldPass")
            payload.delete("newPass")
            payload.delete("CPass")
            payload.append("userPassword", oldPassword)

            let resposnse = await fetch("http://localhost/goparcel/api/userUpdate.php",

                {
                    method: "POST",
                    body: payload
                })
            const data = await resposnse.text();
            console.log(data)
            if (data.startsWith("ERROR")) {
                let err = data.split(";");
                err.pop();
                err.forEach((er) => {
                    if (er.split(":")[1] == "EMAIL") {
                        form.userEmail.classList.add("exist")
                        console.log("email ")
                    }
                    if (er.split(":")[1] == "USERNAME") {
                        form.userName.classList.add("exist")
                        console.log("username")
                    }
                })
                console.log(err)
                if (err.length == 1) {
                    err[0].split(":")[1].toLocaleLowerCase() == "username" ? form.userName.previousElementSibling.innerHTML = "Username - <span class='existing'>Already exist</span>" : form.userEmail.previousElementSibling.innerHTML = "Email - <span class='existing'>Already exist</span>";
                }
                else {
                    form.userName.previousElementSibling.innerHTML = "Username - <span class='existing'>Already been used</span>";
                    form.userEmail.previousElementSibling.innerHTML = "Email - <span class='existing'>Already been used</span>";
                }
            }
            else{
                alert("Successly update user")
                window.history.back()
            }

        }
    }, 50)
})