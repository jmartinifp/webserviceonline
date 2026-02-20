import { Config } from "../config/config.js";
import { UsuarioViewModel } from "./viewmodels/usuarioviewmodel.js";

const conf= new Config();
const urlUsuario=conf.getUrlUsuario();
const pvm= new UsuarioViewModel();
const datos= await pvm.cargarUsuario(urlUsuario);
console.log(JSON.stringify(datos));
pvm.render(datos);
