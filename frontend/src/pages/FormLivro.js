import React, { useEffect, useState } from "react";
import { Form, Input, Button } from "antd";
import LivrosService from "../services/livrosService";
import AutoresService from "../services/autoresService";
import GenerosService from "../services/generosService";
import EditorasService from "../services/editorasService";
import { NavLink, useParams } from "react-router-dom";
import { Select } from "antd";
import "./style.css";

export default function FormLivro() {
  const [nomeLivro, setNomeLivro] = useState(null);
  const [idGenero, setIdGenero] = useState(null);
  const [idEditora, setIdEditora] = useState(null);
  const [idAutor, setIdAutor] = useState(null);

  const { id } = useParams();
  const { Option } = Select;
  const [childrenEditora, setChildrenEditora] = useState(null);
  const [childrenGenero, setChildrenGenero] = useState(null);
  const [childrenAutor, setChildrenAutor] = useState(null);

  useEffect(() => {
    EditorasService.getAll()
      .then((response) => {
        setChildrenEditora(response.data);
      })
      .catch((error) => {
        console.log(error);
      });

    GenerosService.getAll()
      .then((response) => {
        setChildrenGenero(response.data);
      })
      .catch((error) => {
        console.log(error);
      });

    AutoresService.getAll()
      .then((response) => {
        setChildrenAutor(response.data);
      })
      .catch((error) => {
        console.log(error);
      });

    if (id != 0) {
      LivrosService.get(id)
        .then((response) => {
          //setNomeLivro(response.data.nome);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }, []);

  function onChangeEditora(value) {
    setIdEditora(value);
  }

  function onChangeGenero(value) {
    setIdGenero(value);
  }

  function onChangeAutor(value) {
    setIdAutor(value);
  }

  function onBlur() {
    console.log("blur");
  }

  function onFocus() {
    console.log("focus");
  }

  function onSearch(val) {
    console.log("search:", val);
  }

  const onFinish = (values) => {
    if (id != 0) {
      LivrosService.update(
        id,
        idAutor,
        idGenero,
        idEditora,
        values.titulo,
        values.ano_de_lancamento
      )
        .then((response) => {
          window.location.href = "/livros";
        })
        .catch((error) => {
          console.log(error);
        });
    } else {
      LivrosService.add(
        idAutor,
        idGenero,
        idEditora,
        values.titulo,
        values.ano_de_lancamento
      )
        .then((response) => {
          window.location.href = "/livros";
        })
        .catch((error) => {
          console.log(error);
        });
    }
  };

  const onFinishFailed = (errorInfo) => {
    console.log("Failed:", errorInfo);
  };

  return (
    <>
      <div className="wrapper">
        <Button>
          <NavLink to={"/livros"}>voltar</NavLink>
        </Button>

        <Form name="basic" onFinish={onFinish} onFinishFailed={onFinishFailed}>
          <Form.Item
            label="Título do livro"
            name="titulo"
            rules={[
              { required: true, message: "Título do livro " },
              { max: 30, message: "nome com máximo de 30 caracteres" },
            ]}
          >
            <Input placeholder="Título do livro" name="titulo" />
          </Form.Item>

          <Form.Item
            label="Ano de lancamento"
            name="ano_de_lancamento"
            rules={[
              { required: true, message: "Ano de lancamento " },
              { max: 4, message: "ano com 4  caracteres" },
            ]}
          >
            <Input placeholder="Ano de lancamento" name="ano_de_lancamento" />
          </Form.Item>

          <Form.Item
            label="Editora"
            name="editora"
            rules={[
              { required: true, message: "Nome da Editora" },
              { max: 20, message: "nome com máximo de 20 caracteres" },
            ]}
          >
            <Select
              showSearch
              style={{ width: 200 }}
              placeholder="Selecione uma editora"
              optionFilterProp="childrenEditora"
              onChange={onChangeEditora}
              onFocus={onFocus}
              onBlur={onBlur}
              onSearch={onSearch}
              filterOption={(input, option) =>
                option.childrenEditora
                  .toLowerCase()
                  .indexOf(input.toLowerCase()) >= 0
              }
            >
              {childrenEditora &&
                childrenEditora.map((element) => {
                  return <Option key={element.id}>{element.nome}</Option>;
                })}
            </Select>
          </Form.Item>

          <Form.Item
            label="Genero"
            name="genero"
            rules={[
              { required: true, message: "Tipo de gênero" },
              { max: 20, message: "nome com máximo de 20 caracteres" },
            ]}
          >
            <Select
              showSearch
              style={{ width: 200 }}
              placeholder="Selecione um genero"
              optionFilterProp="childrenGenero"
              onChange={onChangeGenero}
              onFocus={onFocus}
              onBlur={onBlur}
              onSearch={onSearch}
              filterOption={(input, option) =>
                option.childrenGenero
                  .toLowerCase()
                  .indexOf(input.toLowerCase()) >= 0
              }
            >
              {childrenGenero &&
                childrenGenero.map((element) => {
                  return <Option key={element.id}>{element.nome}</Option>;
                })}
            </Select>
          </Form.Item>

          <Form.Item
            label="Autor"
            name="autor"
            rules={[
              { required: true, message: "Nome do Autor" },
              { max: 20, message: "nome com máximo de 20 caracteres" },
            ]}
          >
            <Select
              showSearch
              style={{ width: 200 }}
              placeholder="Selecione um autor"
              optionFilterProp="childrenAutor"
              onChange={onChangeAutor}
              onFocus={onFocus}
              onBlur={onBlur}
              onSearch={onSearch}
              filterOption={(input, option) =>
                option.childrenAutor
                  .toLowerCase()
                  .indexOf(input.toLowerCase()) >= 0
              }
            >
              {childrenAutor &&
                childrenAutor.map((element) => {
                  return <Option key={element.id}>{element.nome}</Option>;
                })}
            </Select>
          </Form.Item>

          <Form.Item>
            <Button type="primary" htmlType="submit">
              Enviar
            </Button>
          </Form.Item>
        </Form>
      </div>
    </>
  );
}
