import { drawIndexInit } from './index';
import { displayMessages, displayErrorMessages } from './helper';

export const drawCreateInit = () => {
    axios.post('http://localhost/Laravel-Bank/public/accountsJS/create', {}).then( (response) => {  
        console.log('getting edit info');
        console.log(response.data);
        const contentJSONDOM = document.querySelector('#contentJSON');
        if (contentJSONDOM) {
            contentJSONDOM.innerHTML = `
                <div class="card-header">Edit Account</div>
                <div class="card-body"> 
                    <div class="form-group">
                        <label> Account </label>
                        <input type="text" id="createAccount" name="account" value="${response.data.newAccount}" class="form-control">
                        <small class="form-text text-muted">Account Name</small>
                    </div>
                    <div class="form-group">
                        <label>Personal Code</label>
                        <input type="text" id="createPersonID" name="personal_code" value="${response.data.newPersonID}" class="form-control">
                        <small class="form-text text-muted">Person's ID</small>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="createName" name="name" value="${response.data.newName}" class="form-control">
                        <small class="form-text text-muted">Person's Name</small>
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" id="createSurname" name="surname" value="${response.data.newSurname}" class="form-control">
                        <small class="form-text text-muted">Person's Surname</small>
                    </div>
                    <button id="createButton" type="submit" onclick=""> ADD </button>
                </div>
            `;

            const createButton = document.querySelector('#createButton');
            if (createButton) {
                createButton.addEventListener("click", () => { 
                    console.log('create');
                    axios.post('http://localhost/Laravel-Bank/public/accountsJS/store', 
                    {
                        uuid: response.data.newUuid,
                        account: document.querySelector('#createAccount').value,
                        personal_code: document.querySelector('#createPersonID').value,
                        name: document.querySelector('#createName').value,
                        surname: document.querySelector('#createSurname').value,
                        value: response.data.newValue,
                    })
                    .then((response) => {  
                        console.log(response);
                        displayMessages(response.data);
                        drawIndexInit();
                    })
                    .catch((error) => {
                        console.log(error);
                        displayErrorMessages(error.response.data.errors);
                    });
                });
            }
        }
    })
    .catch( (error) => {console.log(error);} );
}