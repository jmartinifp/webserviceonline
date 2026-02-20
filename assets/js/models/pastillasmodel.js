export class PastillasModel
{

    async getPastillas(url)
    {
        try{
            const respuesta= await fetch(url);
            if (!respuesta.ok)
            {
                console.log("Error en la la respuesta: "+respuesta.status);
                return null;
            }
            const datos= await respuesta.json();
            return datos;

        }
        catch(error)
        {
            console.log("Error en la petición: "+error);
            return null;
        }
    }

}