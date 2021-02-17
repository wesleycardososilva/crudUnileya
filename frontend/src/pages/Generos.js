import React, { useEffect, useState } from "react";
import GenerosService from "../services/generosService";
import { Table, Button } from "antd";
import { NavLink } from "react-router-dom";

export default function Generos() {
  const [dataTable, setDataTable] = useState(null);
  const [columns, setColumns] = useState(null);

  useEffect(() => {
    setColumns([
      {
        title: "#",
        dataIndex: "id",
        key: "id",
      },
      {
        title: "Nome",
        dataIndex: "nome",
        key: "nome",
      },
      
      {
        title: "Editar",
        key: "editar",

        render: (genero) => (
          <NavLink to={"/formGenero/" + genero.id}>
            <span>Editar</span>
          </NavLink>
        ),
      },
      {
        title: "Excluir",
        key: "excluir",
        render: (genero) => (
          <Button
            onClick={(e) => {
              e.preventDefault();
              GenerosService.delete(genero.id)
                .then((response) => {
                    GenerosService.getAll()
                    .then((response) => {
                      setDataTable(response.data);
                    })
                    .catch((error) => {
                      console.log("error");
                    });
                })
                .catch((error) => {
                  console.log("error");
                });
            }}
          >
            Excluir
          </Button>
        ),
      },
    ]);

    GenerosService.getAll()
      .then((response) => {
        setDataTable(response.data);
      })
      .catch((error) => {
        console.log("error");
      });
  }, []);

  return (
    <>
    <Button><NavLink to={'/formGenero/0'}>Adicionar</NavLink></Button>
      <Table dataSource={dataTable} columns={columns} rowKey="id" />{" "}
    </>
  );
}
