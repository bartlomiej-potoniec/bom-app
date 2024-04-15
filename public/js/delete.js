console.log('inside');

document.querySelectorAll('.delete-link').forEach((link) =>
    link.addEventListener('click', function (event) {
        event.preventDefault();

        if (!confirm("Czy na pewno chcesz usunąć ten element?")) {
            return;
        }

        const elementId = this.getAttribute("data-id");
        const deleteActionUrl = this.getAttribute("href");

        const formData = new FormData();
        formData.append("elementId", elementId);

        fetch(deleteActionUrl, {
            method: "POST",
            body: formData,
        }).then((response) => {
            location.reload();
        });
    })
);
