const userComment = document.querySelector(".user-comments");
const userComments = document.querySelectorAll(".user-comment");

let originalElement = null;
let replaceElement = null;

let isOpen = false;
let id = "";


userComment?.addEventListener("click", function (e) {
    if (e.target.closest(".edit-blog")) {
        handelElements(e);
    }
});

const setIsOpen = (data) => {
    isOpen = data;
};

const getData = () => {
    return `<form action="/comments/${id}/update" method="POST" class="comment">
<input type="hidden" name="_token" value="${document
        .querySelector('meta[name="_token"]')
        .getAttribute("content")}" />
<textarea class="form-control" name="body" id="floatingTextarea2">${originalElement.querySelector(".comment-content").textContent}</textarea>

<button class="btn btn-secondary mt-3" onclick="cancel()">Cancel</button>
<button class="btn btn-success mt-3">Comment</button>
</form>`;
};

function App() {
    replaceElement.textContent = "";
    if (isOpen) {
        replaceElement.insertAdjacentHTML("afterbegin", getData());
        // console.log(originalElement);
    } else {
        replaceElement.replaceWith(originalElement);
        // console.log();
        
        // replaceElement.childNodes = originalElement.childNodes
    }
}

function handelElements(e) {
    e.preventDefault();
    const index = e.target.getAttribute("key");
    setIsOpen(true);
    id = e.target.getAttribute("id");
    replaceElement = userComments[index].querySelector(".comment-body");
    originalElement = replaceElement.cloneNode(true);
    App();
    
}

function cancel() {
    setIsOpen(false);
    App();
}