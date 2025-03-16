document.addEventListener("DOMContentLoaded", () => {
	const loginButton = document.querySelector("#login");
	const addErr2 = document.querySelector("#add_err2");

	loginButton.addEventListener("click", async (event) => {
		event.preventDefault();

		const email = document.querySelector("#email").value;
		const password = document.querySelector("#password").value;

		// Mostra mensagem de carregamento
		addErr2.innerHTML = "loading...";

		try {
			const response = await fetch("pcheck.php", {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: new URLSearchParams({ email, password }).toString(),
			});

			const html = await response.text();

			if (html === "true") {
				addErr2.innerHTML = `
                    <div class="alert alert-success">
                        <strong>Authenticated</strong>
                    </div>
                `;
				window.location.href = "blog.php";
			} else if (html === "false") {
				addErr2.innerHTML = `
                    <div class="alert alert-danger">
                        <strong>Authentication</strong> failure.
                    </div>
                `;
			} else {
				addErr2.innerHTML = `
                    <div class="alert alert-danger">
                        <strong>Error</strong> processing request. Please try again.
                    </div>
                `;
			}
		} catch (error) {
			addErr2.innerHTML = `
                <div class="alert alert-danger">
                    <strong>Error:</strong> ${error.message}
                </div>
            `;
		}
	});
});
