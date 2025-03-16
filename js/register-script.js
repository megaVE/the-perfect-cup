document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("register").addEventListener("click", async (event) => {
        event.preventDefault();

        const firstName = document.getElementById("first_name").value;
        const lastName = document.getElementById("last_name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        const data = new URLSearchParams({
            first_name: firstName,
            last_name: lastName,
            email,
            password,
        });

        try {
            document.getElementById("add_err2").innerText = "loading...";
            const response = await fetch("adduser.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: data,
            });

            const html = await response.text();
            console.log("response: ", html);

            const errorContainer = document.getElementById("add_err2");
            switch (html) {
                case "true":
                    errorContainer.innerHTML = `<div class="alert alert-success">
                        <strong>Account</strong> processed.
                    </div>`;
                    window.location.href = "index.php";
                    break;

                case "false":
                    errorContainer.innerHTML = `<div class="alert alert-danger">
                        <strong>Email Address</strong> already in system.
                    </div>`;
                    break;

                case "first_name":
                    errorContainer.innerHTML = `<div class="alert alert-danger">
                        <strong>First Name</strong> is required.
                    </div>`;
                    break;

                case "last_name":
                    errorContainer.innerHTML = `<div class="alert alert-danger">
                        <strong>Last Name</strong> is required.
                    </div>`;
                    break;

                case "eshort":
                    errorContainer.innerHTML = `<div class="alert alert-danger">
                        <strong>Email Address</strong> is required.
                    </div>`;
                    break;

                case "eformat":
                    errorContainer.innerHTML = `<div class="alert alert-danger">
                        <strong>Email Address</strong> format is not valid.
                    </div>`;
                    break;

                case "pshort":
                    errorContainer.innerHTML = `<div class="alert alert-danger">
                        <strong>Password</strong> must be at least 4 characters.
                    </div>`;
                    break;

                default:
                    errorContainer.innerHTML = `<div class="alert alert-danger">
                        <strong>Error</strong> processing request. Please try again.
                    </div>`;
                    break;
            }
        } catch (error) {
            console.error("Request failed", error);
            document.getElementById("add_err2").innerHTML = `<div class="alert alert-danger">
                <strong>Error</strong> processing request. Please try again.
            </div>`;
        }
    });
});
