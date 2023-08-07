let countryName = document.querySelector(
    "#editcountrymodal input[name='countryName']"
);

const editModal = document.getElementById("editcountry");

const editBtnList = document.querySelectorAll(".btn-edit");

const editCountry = e => {
    e.preventDefault();
    if (e.target.tagName === "I") {
        btn = e.target.parentNode;
    } else {
        btn = e.target;
    }
    href = btn.href;
    fetch(`${href}`)
        .then(response => response.json())
        .then(data => {
            if (!data) {
                return;
            }
            console.log(data.data.email);

            //change here for data
            countryName.value = data.data.email;
            //chaangehere for route
            editModal.action = `${editModal.action}/${data.data.id}`;
            console.log(editModal.action);
            $("#editcountrymodal").modal("toggle");
        });
};

editBtnList.forEach(item => {
    item.addEventListener("click", editCountry);
});

$(".btn-delete").click(e => {
    if (!confirm("Do you want to delete!!!")) {
        e.preventDefault();
    }
});

const addBtn = document.getElementById("add");
const removeBtn = document.getElementById("remove");
const inputHighlight = document.getElementById("highlight");

$(".add").click(() => {
    let input = document.createElement("input");
    input.classList.add("form-control");
    input.classList.add("my-1");
    input.name = "highlight[]";

    addBtn.parentNode.insertBefore(input, addBtn);
});

const image = $("#image");
image.change(e => {
    console.log(e.target.files);
    if (
        e.target.files[0].type !== "image/jpeg" &&
        e.target.files[0].type !== "image/png"
    ) {
        image.replaceWith(image.val("").clone(true));
        alert("file is not allowed");
    } else if (e.target.files[0].size > 2097152) {
        image.replaceWith(image.val("").clone(true));
        alert("file size is bigger than 2mb");
    }
});

$(document).ready(function() {
    $("#dataTable").DataTable();
});
