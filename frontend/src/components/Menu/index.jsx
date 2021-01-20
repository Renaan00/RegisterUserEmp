import React, {useState} from 'react';
import API from '../../axios/Api';
import {useHistory} from 'react-router-dom';

const Menu = ({match}) => {
    const history = useHistory();
    const [update, setUpdate] = useState({
        email: "",
        senha: ""
    });

    const controleUpdate = (event) => {
        setUpdate({
            ...update,
            [event.target.name]: event.target.value
        });
    }

    async function upDate(event) {
        event.preventDefault();

        await API.post('/Alterar.php', update)
        .then((response) => { 
            console.log(response)
        })
    }

    function deleteUser (event) {
        event.preventDefault();
        async function del (){
            await API.delete('/Excluir.php?id='+ match.params.id)
            .then((res) => {
                console.log(res.data.sucess);
                comeBack();
            });
        };
        del()
    }

    const comeBack = () => history.push("/");
    

    return(
        <>
            <button className="btn btn-danger" onClick={deleteUser}>Apagar Conta</button>
            <main>
                <form onSubmit={upDate} className="m-4">
                    <fieldset>
                        <legend>Login</legend>
                            <label htmlFor="email">E-mail:</label><br/>
                            <input onChange={controleUpdate} type="email" name="email" id="email"></input><br/>
                            <label htmlFor="senha">Senha:</label><br/>
                            <input onChange={controleUpdate} type="password" name="senha" id="senha"></input><br/><br/>
                            <button className="btn btn-success">Alterar</button>
                    </fieldset>
                </form>
            </main>
        </>
    );
}

export default Menu;