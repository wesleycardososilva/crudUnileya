import React, { useEffect, useState } from "react";
import { Form, Input, Button } from "antd";
import GenerosService from "../services/generosService";
import { NavLink, useParams } from "react-router-dom";
import "./style.css";

export default function FormGenero() {
  const [nomeGenero, setNomeGenero] = useState(null);
  const { id } = useParams();

  useEffect(() => {
    if (id != 0) {
        GenerosService.get(id)
        .then((response) => {
          setNomeGenero(response.data.nome);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }, []);

  const onFinish = (values) => {
    if (id!=0) {
        GenerosService.update(id, values.nome)
        .then((response) => {
          window.location.href = "/generos";
        })
        .catch((error) => {
          console.log(error);
        });
    } else {
        GenerosService.add(values.nome)
        .then((response) => {
          window.location.href = "/generos";
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
        <NavLink to={"/generos"}>voltar</NavLink>
      </Button>

      <Form name="basic" onFinish={onFinish} onFinishFailed={onFinishFailed}>
        {id != 0 && (
          <p>
            O nome atual do gênero é <em>"{nomeGenero}"</em>.
          </p>
        )}
        <Form.Item
          label="Nome do gênero"
          name="nome"
          rules={[
            { required: true, message: "Nome da Genero" },
            { max: 20, message: "nome com máximo de 20 caracteres" },
          ]}
        >
          <Input placeholder="Nome da Genero" name="nome" />
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
