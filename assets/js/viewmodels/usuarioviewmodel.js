import { UsuarioModel } from "../models/usuariomodel.js";

export class UsuarioViewModel
{
    constructor()
    {
        this.model= new UsuarioModel();
    }
    async cargarUsuario(url)
    {
        return await this.model.getUsuario(url);
    }
    render(info)
    {
        const informacion= document.getElementById("informacion");
        informacion.innerHTML="";
        informacion.innerHTML+=`<div class="d-flex">
                <div class="flex-shrink-0">
                    <img
                        class="imagen"
                        src="./assets/img/usuario.jpg"
                        alt="Image"
                    />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5>${info[0].nombre}</h5>
                    <p>
                        ${info[0].email} 
                    </p>
                    
                </div>
            </div>`;
            
       
      
    }
}