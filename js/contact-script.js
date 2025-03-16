document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("contact").addEventListener("click", async (event) => {
        event.preventDefault();

        const fname = document.getElementById("fname").value;
        const email = document.getElementById("email").value;
        const message = document.getElementById("message").value;
        const addErr2 = document.getElementById("add_err2");

        addErr2.innerHTML = "Loading...";

        try {
            const response = await fetch("sendmsg.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams({ fname, email, message }).toString(),
            });

            const result = await response.text();
            let alertMessage = "";

            switch (result) {
                case "true":
                    alertMessage = '<div class="alert alert-success"><strong>Message Sent!</strong></div>';
                    break;
                case "fname_long":
                    alertMessage = '<div class="alert alert-danger"><strong>First Name</strong> cannot exceed 50 characters.</div>';
                    break;
                case "fname_short":
                    alertMessage = '<div class="alert alert-danger"><strong>First Name</strong> must exceed 2 characters.</div>';
                    break;
                case "email_long":
                    alertMessage = '<div class="alert alert-danger"><strong>Email</strong> cannot exceed 50 characters.</div>';
                    break;
                case "email_short":
                    alertMessage = '<div class="alert alert-danger"><strong>Email</strong> must exceed 2 characters.</div>';
                    break;
                case "eformat":
                    alertMessage = '<div class="alert alert-danger"><strong>Email</strong> format incorrect.</div>';
                    break;
                case "message_long":
                    alertMessage = '<div class="alert alert-danger"><strong>Message</strong> cannot exceed 50 characters.</div>';
                    break;
                case "message_short":
                    alertMessage = '<div class="alert alert-danger"><strong>Message</strong> must exceed 2 characters.</div>';
                    break;
                default:
                    alertMessage = '<div class="alert alert-danger"><strong>Error</strong> processing request. Please try again.</div>';
                    break;
            }

            addErr2.innerHTML = alertMessage;
        } catch (error) {
            addErr2.innerHTML = '<div class="alert alert-danger"><strong>Error</strong> connecting to the server.</div>';
        }
    });
});
