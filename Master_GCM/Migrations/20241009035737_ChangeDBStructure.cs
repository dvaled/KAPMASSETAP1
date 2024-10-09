using System;
using Microsoft.EntityFrameworkCore.Migrations;
using Npgsql.EntityFrameworkCore.PostgreSQL.Metadata;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class ChangeDBStructure : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_DTL_SOFTWARE_TRN_ASSET_IDASSET",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropForeignKey(
                name: "FK_TRN_LOG_TRN_ASSET_IDASSET",
                table: "TRN_LOG");

            migrationBuilder.DropIndex(
                name: "IX_TRN_LOG_IDASSET",
                table: "TRN_LOG");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_HIST_MAINTENANCE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_HIST_ASSET",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_DTL_SPEC",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_DTL_SOFTWARE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SOFTWARE_IDASSET",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_DTL_PICTURE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.DropColumn(
                name: "IDASSET",
                table: "TRN_LOG");

            migrationBuilder.DropColumn(
                name: "IDASSET",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropColumn(
                name: "IDASSET",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropColumn(
                name: "IDASSET",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropColumn(
                name: "IDASSET",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropColumn(
                name: "IDASSET",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.AddColumn<string>(
                name: "ASSETCODE",
                table: "TRN_LOG",
                type: "text",
                nullable: true);

            migrationBuilder.AlterColumn<int>(
                name: "MAINTENANCEID",
                table: "TRN_HIST_MAINTENANCE",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<string>(
                name: "ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                type: "text",
                nullable: true);

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETHISTORY",
                table: "TRN_HIST_ASSET",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<string>(
                name: "ASSETCODE",
                table: "TRN_HIST_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETSPEC",
                table: "TRN_DTL_SPEC",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<string>(
                name: "ASSETCODE",
                table: "TRN_DTL_SPEC",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETSOFTWARE",
                table: "TRN_DTL_SOFTWARE",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<string>(
                name: "ASSETCODE",
                table: "TRN_DTL_SOFTWARE",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETPIC",
                table: "TRN_DTL_PICTURE",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<string>(
                name: "ASSETCODE",
                table: "TRN_DTL_PICTURE",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AddColumn<DateOnly>(
                name: "ADDEDDATE",
                table: "TRN_ASSET",
                type: "date",
                nullable: false,
                defaultValue: new DateOnly(1, 1, 1));

            migrationBuilder.AddColumn<string>(
                name: "ASSETCATEGORY",
                table: "TRN_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AddColumn<string>(
                name: "ASSETCODE",
                table: "TRN_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AddColumn<string>(
                name: "ASSETTYPE",
                table: "TRN_ASSET",
                type: "text",
                nullable: false,
                defaultValue: "");

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_HIST_MAINTENANCE",
                table: "TRN_HIST_MAINTENANCE",
                column: "MAINTENANCEID");

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_HIST_ASSET",
                table: "TRN_HIST_ASSET",
                column: "IDASSETHISTORY");

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_DTL_SPEC",
                table: "TRN_DTL_SPEC",
                column: "IDASSETSPEC");

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_DTL_SOFTWARE",
                table: "TRN_DTL_SOFTWARE",
                column: "IDASSETSOFTWARE");

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_DTL_PICTURE",
                table: "TRN_DTL_PICTURE",
                column: "IDASSETPIC");

            migrationBuilder.AddUniqueConstraint(
                name: "AK_TRN_ASSET_ASSETCODE",
                table: "TRN_ASSET",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_DTL_PICTURE_TRN_ASSET_ASSETCODE",
                table: "TRN_DTL_PICTURE",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_DTL_SOFTWARE_TRN_ASSET_ASSETCODE",
                table: "TRN_DTL_SOFTWARE",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_DTL_SPEC_TRN_ASSET_ASSETCODE",
                table: "TRN_DTL_SPEC",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_HIST_ASSET_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_HIST_MAINTENANCE_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE");

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_LOG_TRN_ASSET_ASSETCODE",
                table: "TRN_LOG",
                column: "ASSETCODE",
                principalTable: "TRN_ASSET",
                principalColumn: "ASSETCODE");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_DTL_PICTURE_TRN_ASSET_ASSETCODE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.DropForeignKey(
                name: "FK_TRN_DTL_SOFTWARE_TRN_ASSET_ASSETCODE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropForeignKey(
                name: "FK_TRN_DTL_SPEC_TRN_ASSET_ASSETCODE",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropForeignKey(
                name: "FK_TRN_HIST_ASSET_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropForeignKey(
                name: "FK_TRN_HIST_MAINTENANCE_TRN_ASSET_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropForeignKey(
                name: "FK_TRN_LOG_TRN_ASSET_ASSETCODE",
                table: "TRN_LOG");

            migrationBuilder.DropIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_HIST_MAINTENANCE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_HIST_ASSET",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_DTL_SPEC",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_DTL_SOFTWARE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropPrimaryKey(
                name: "PK_TRN_DTL_PICTURE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.DropUniqueConstraint(
                name: "AK_TRN_ASSET_ASSETCODE",
                table: "TRN_ASSET");

            migrationBuilder.DropColumn(
                name: "ASSETCODE",
                table: "TRN_LOG");

            migrationBuilder.DropColumn(
                name: "ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropColumn(
                name: "ASSETCODE",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropColumn(
                name: "ASSETCODE",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropColumn(
                name: "ASSETCODE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropColumn(
                name: "ASSETCODE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.DropColumn(
                name: "ADDEDDATE",
                table: "TRN_ASSET");

            migrationBuilder.DropColumn(
                name: "ASSETCATEGORY",
                table: "TRN_ASSET");

            migrationBuilder.DropColumn(
                name: "ASSETCODE",
                table: "TRN_ASSET");

            migrationBuilder.DropColumn(
                name: "ASSETTYPE",
                table: "TRN_ASSET");

            migrationBuilder.AddColumn<int>(
                name: "IDASSET",
                table: "TRN_LOG",
                type: "integer",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AlterColumn<int>(
                name: "MAINTENANCEID",
                table: "TRN_HIST_MAINTENANCE",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .OldAnnotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<int>(
                name: "IDASSET",
                table: "TRN_HIST_MAINTENANCE",
                type: "integer",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETHISTORY",
                table: "TRN_HIST_ASSET",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .OldAnnotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<int>(
                name: "IDASSET",
                table: "TRN_HIST_ASSET",
                type: "integer",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETSPEC",
                table: "TRN_DTL_SPEC",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .OldAnnotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<int>(
                name: "IDASSET",
                table: "TRN_DTL_SPEC",
                type: "integer",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETSOFTWARE",
                table: "TRN_DTL_SOFTWARE",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .OldAnnotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<int>(
                name: "IDASSET",
                table: "TRN_DTL_SOFTWARE",
                type: "integer",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AlterColumn<int>(
                name: "IDASSETPIC",
                table: "TRN_DTL_PICTURE",
                type: "integer",
                nullable: false,
                oldClrType: typeof(int),
                oldType: "integer")
                .OldAnnotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn);

            migrationBuilder.AddColumn<int>(
                name: "IDASSET",
                table: "TRN_DTL_PICTURE",
                type: "integer",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_HIST_MAINTENANCE",
                table: "TRN_HIST_MAINTENANCE",
                columns: new[] { "MAINTENANCEID", "IDASSET" });

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_HIST_ASSET",
                table: "TRN_HIST_ASSET",
                columns: new[] { "IDASSETHISTORY", "IDASSET" });

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_DTL_SPEC",
                table: "TRN_DTL_SPEC",
                columns: new[] { "IDASSETSPEC", "IDASSET" });

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_DTL_SOFTWARE",
                table: "TRN_DTL_SOFTWARE",
                columns: new[] { "IDASSETSOFTWARE", "IDASSET" });

            migrationBuilder.AddPrimaryKey(
                name: "PK_TRN_DTL_PICTURE",
                table: "TRN_DTL_PICTURE",
                columns: new[] { "IDASSETPIC", "IDASSET" });

            migrationBuilder.CreateIndex(
                name: "IX_TRN_LOG_IDASSET",
                table: "TRN_LOG",
                column: "IDASSET",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SOFTWARE_IDASSET",
                table: "TRN_DTL_SOFTWARE",
                column: "IDASSET");

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_DTL_SOFTWARE_TRN_ASSET_IDASSET",
                table: "TRN_DTL_SOFTWARE",
                column: "IDASSET",
                principalTable: "TRN_ASSET",
                principalColumn: "IDASSET",
                onDelete: ReferentialAction.Cascade);

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_LOG_TRN_ASSET_IDASSET",
                table: "TRN_LOG",
                column: "IDASSET",
                principalTable: "TRN_ASSET",
                principalColumn: "IDASSET",
                onDelete: ReferentialAction.Cascade);
        }
    }
}
