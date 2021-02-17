import React from "react";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import Autores from "./pages/Autores";
import Generos from "./pages/Generos";
import Editoras from "./pages/Editoras";
import Livros from "./pages/Livros";
import FormEditora from "./pages/FormEditora";
import FormGenero from "./pages/FormGenero";
import FormAutor from "./pages/FormAutor";
import FormLivro from "./pages/FormLivro";
import Menu from "./pages/menu";

export default function Routes() {
  return (
    <BrowserRouter>
      <Switch>
        <Route path="/autores">
          <Autores />
        </Route>
        <Route path="/generos">
          <Generos />
        </Route>
        <Route path="/editoras">
          <Editoras />
        </Route>
        <Route path="/livros">
          <Livros />
        </Route>
        <Route path="/formEditora/:id">
          <FormEditora />
        </Route>
        <Route path="/formGenero/:id">
          <FormGenero />
        </Route>
        <Route path="/formAutor/:id">
          <FormAutor />
        </Route>
        <Route path="/formLivro/:id">
          <FormLivro />
        </Route>
        <Route path="/">
          <Menu/>
        </Route>
      </Switch>
    </BrowserRouter>
  );
}
