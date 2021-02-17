import React, { useEffect, useState } from "react";
import AutoresService from "../services/autoresService";
import { Table, Button } from "antd";
import { NavLink } from "react-router-dom";

export default function Autores() {
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
        title: "Ano de nascimento",
        dataIndex: "ano_de_nascimento",
        key: "ano_de_nascimento",
      },
      {
        title: "Sexo",
        dataIndex: "sexo",
        key: "sexo",
      },
      {
        title: "Nacionalidade",
        dataIndex: "nacionalidade",
        key: "nacionalidade",
      },
      {
        title: "Editar",
        key: "editar",

        render: (autor) => (
          <NavLink to={"/formAutor/" + autor.id}>
            <span>Editar</span>
          </NavLink>
        ),
      },
      {
        title: "Excluir",
        key: "excluir",
        render: (autor) => (
          <Button
            onClick={(e) => {
              e.preventDefault();
              AutoresService.delete(autor.id)
                .then((response) => {
                  AutoresService.getAll()
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

    AutoresService.getAll()
      .then((response) => {
        setDataTable(response.data);
      })
      .catch((error) => {
        console.log("error");
      });
  }, []);

  return (
    <>
    <Button><NavLink to={'/formAutor/0'}>Adicionar</NavLink></Button>
      <Table dataSource={dataTable} columns={columns} rowKey="id" />{" "}
    </>
  );
}
