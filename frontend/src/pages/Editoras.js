import React, { useEffect, useState } from "react";
import EditorasService from "../services/editorasService";
import { Table, Button } from "antd";
import { NavLink } from "react-router-dom";

export default function Editoras() {
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

        render: (editora) => (
          <NavLink to={"/formEditora/" + editora.id}>
            <span>Editar</span>
          </NavLink>
        ),
      },
      {
        title: "Excluir",
        key: "excluir",
        render: (editora) => (
          <Button
            onClick={(e) => {
              e.preventDefault();
              EditorasService.delete(editora.id)
                .then((response) => {
                    EditorasService.getAll()
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

    EditorasService.getAll()
      .then((response) => {
        setDataTable(response.data);
      })
      .catch((error) => {
        console.log("error");
      });
  }, []);

  return (
    <>
    <Button><NavLink to={'/formEditora/0'}>Adicionar</NavLink></Button>
      <Table dataSource={dataTable} columns={columns} rowKey="id" />{" "}
    </>
  );
}
