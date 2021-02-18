import React, { useEffect, useState } from "react";
import LivrosService from "../services/livrosService";
import { Table, Button } from "antd";
import { NavLink } from "react-router-dom";

export default function Livros() {
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
        title: "Titulo",
        dataIndex: "titulo",
        key: "titulo",
      },

      {
        title: "Autor",
        dataIndex: "autor",
        key: "autor",
      },

      {
        title: "Gênero",
        dataIndex: "genero",
        key: "genero",
      },
      {
        title: "Editora",
        dataIndex: "editora",
        key: "editora",
      },
      {
        title: "Ano de lançamento",
        dataIndex: "ano_de_lancamento",
        key: "ano_de_lancamento",
      },
      {
        title: "Editar",
        key: "editar",

        render: (livro) => (
          <NavLink to={"/formLivros/" + livro.id}>
            <span>Editar</span>
          </NavLink>
        ),
      },
      {
        title: "Excluir",
        key: "excluir",
        render: (livro) => (
          <Button
            onClick={(e) => {
              e.preventDefault();
              LivrosService.delete(livro.id)
                .then((response) => {
                  LivrosService.getAll()
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

    LivrosService.getAll()
      .then((response) => {
        setDataTable(response.data);
      })
      .catch((error) => {
        console.log("error");
      });
  }, []);

  return (
    <>
      <Button>
        <NavLink to={"/formLivro/0"}>Adicionar</NavLink>
      </Button>
      <Table dataSource={dataTable} columns={columns} rowKey="id" />{" "}
    </>
  );
}
