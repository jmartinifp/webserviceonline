import { PastillasModel } from "../models/pastillasmodel.js";

export class PastillasViewModel
{
    constructor()
    {
        this.model= new PastillasModel();
    }
    async cargarPastillas(url)
    {
        return await this.model.getPastillas(url);
    }
    render(info)
    {
        const informacion= document.getElementById("informacion");
        informacion.innerHTML="";
        for(const pastilla of info)
        {
            informacion.innerHTML+=`<div class="d-flex">
                <div class="flex-shrink-0">
                    <img
                        class="imagen"
                        src="./assets/img/capsula.jpg"
                        alt="Image"
                    />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5>${pastilla.nombre}</h5>
                    <p>
                        ${pastilla.hora} - ${pastilla.duracion}
                    </p>
                    
                </div>
            </div>`;
            
       
        }
      
    }
}