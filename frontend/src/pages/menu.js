import { PageHeader, Button, Descriptions } from 'antd';

import AutoresService from "../services/autoresService";
import { NavLink, useParams } from "react-router-dom";


export default function Menu(){


return(
  <div className="site-page-header-ghost-wrapper">
    <PageHeader
      onBack={() => window.history.back()}
      title="Livraria"
      subTitle=""
      extra={[
        <Button key="3"> <NavLink to={"/editoras"}>Lista de Editoras</NavLink></Button>,
        <Button key="2"> <NavLink to={"/autores"}>Lista de Autores</NavLink></Button>,
        <Button key="1"> <NavLink to={"/livros"}>Lista de Livros</NavLink></Button>,
        <Button key="4"> <NavLink to={"/generos"}>Lista de Generos</NavLink></Button>,
       
      ]}
    >
      
    </PageHeader>
  </div>
);
}
